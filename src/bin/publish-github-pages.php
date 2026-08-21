<?php

declare(strict_types=1);

$sourceDirectory = dirname(__DIR__) . '/_site';
$destinationDirectory = dirname(__DIR__, 2);
$manifestPath = $destinationDirectory . '/.github-pages-manifest';

if (! is_dir($sourceDirectory)) {
    fwrite(STDERR, "Source directory not found: {$sourceDirectory}\n");
    exit(1);
}

function removePath(string $path): bool
{
    if (! file_exists($path) && ! is_link($path)) {
        return true;
    }

    if (is_file($path) || is_link($path)) {
        return unlink($path);
    }

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );

    foreach ($iterator as $item) {
        $itemPath = $item->getPathname();

        if ($item->isDir()) {
            if (! rmdir($itemPath)) {
                return false;
            }

            continue;
        }

        if (! unlink($itemPath)) {
            return false;
        }
    }

    return rmdir($path);
}

function removeEmptyParentDirectories(string $path, string $stopDirectory): void
{
    $directory = dirname($path);

    while ($directory !== $stopDirectory && $directory !== '.' && is_dir($directory)) {
        $entries = array_diff(scandir($directory) ?: [], ['.', '..']);

        if ($entries !== []) {
            return;
        }

        rmdir($directory);
        $directory = dirname($directory);
    }
}

if (is_file($manifestPath)) {
    $previousEntries = json_decode((string) file_get_contents($manifestPath), true);

    if (is_array($previousEntries)) {
        foreach ($previousEntries as $relativePath) {
            if (! is_string($relativePath) || $relativePath === '') {
                continue;
            }

            $publishedPath = $destinationDirectory . DIRECTORY_SEPARATOR . $relativePath;

            if (! removePath($publishedPath)) {
                fwrite(STDERR, "Failed to remove previously published path: {$relativePath}\n");
                exit(1);
            }

            removeEmptyParentDirectories($publishedPath, $destinationDirectory);
        }
    }
}

foreach (new FilesystemIterator($sourceDirectory, FilesystemIterator::SKIP_DOTS) as $item) {
    $destinationPath = $destinationDirectory . DIRECTORY_SEPARATOR . $item->getFilename();

    if (! removePath($destinationPath)) {
        fwrite(STDERR, "Failed to prepare destination path: {$destinationPath}\n");
        exit(1);
    }
}

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($sourceDirectory, FilesystemIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST
);

$publishedFiles = [];

foreach ($iterator as $item) {
    $relativePath = $iterator->getSubPathName();
    $destinationPath = $destinationDirectory . DIRECTORY_SEPARATOR . $relativePath;

    if ($item->isDir()) {
        if (! is_dir($destinationPath) && ! mkdir($destinationPath, 0777, true) && ! is_dir($destinationPath)) {
            fwrite(STDERR, "Failed to create directory: {$destinationPath}\n");
            exit(1);
        }

        continue;
    }

    $publishedFiles[] = $relativePath;

    $targetDirectory = dirname($destinationPath);

    if (! is_dir($targetDirectory) && ! mkdir($targetDirectory, 0777, true) && ! is_dir($targetDirectory)) {
        fwrite(STDERR, "Failed to create directory: {$targetDirectory}\n");
        exit(1);
    }

    $contents = file_get_contents($item->getPathname());

    if ($contents === false || file_put_contents($destinationPath, $contents) === false) {
        fwrite(STDERR, "Failed to copy file: {$relativePath}\n");
        exit(1);
    }
}

sort($publishedFiles);

if (file_put_contents($manifestPath, json_encode($publishedFiles, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL) === false) {
    fwrite(STDERR, "Failed to write publish manifest: {$manifestPath}\n");
    exit(1);
}

fwrite(STDOUT, "Published files from {$sourceDirectory} to {$destinationDirectory}\n");
