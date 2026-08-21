<?php

declare(strict_types=1);

$sourceDirectory = dirname(__DIR__) . '/_site';
$destinationDirectory = dirname(__DIR__, 2);

if (! is_dir($sourceDirectory)) {
    fwrite(STDERR, "Source directory not found: {$sourceDirectory}\n");
    exit(1);
}

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($sourceDirectory, FilesystemIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST
);

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

    $targetDirectory = dirname($destinationPath);

    if (! is_dir($targetDirectory) && ! mkdir($targetDirectory, 0777, true) && ! is_dir($targetDirectory)) {
        fwrite(STDERR, "Failed to create directory: {$targetDirectory}\n");
        exit(1);
    }

    if (! copy($item->getPathname(), $destinationPath)) {
        fwrite(STDERR, "Failed to copy file: {$relativePath}\n");
        exit(1);
    }
}

fwrite(STDOUT, "Published files from {$sourceDirectory} to {$destinationDirectory}\n");
