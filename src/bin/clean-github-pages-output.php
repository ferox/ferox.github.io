<?php

declare(strict_types=1);

$outputDirectory = dirname(__DIR__) . '/_site';

if (! is_dir($outputDirectory)) {
    mkdir($outputDirectory, 0777, true);
    fwrite(STDOUT, "Created clean output directory at {$outputDirectory}\n");
    exit(0);
}

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($outputDirectory, FilesystemIterator::SKIP_DOTS),
    RecursiveIteratorIterator::CHILD_FIRST
);

foreach ($iterator as $item) {
    $path = $item->getPathname();

    if ($item->isDir()) {
        if (! rmdir($path)) {
            fwrite(STDERR, "Failed to remove directory: {$path}\n");
            exit(1);
        }

        continue;
    }

    if (! unlink($path)) {
        fwrite(STDERR, "Failed to remove file: {$path}\n");
        exit(1);
    }
}

fwrite(STDOUT, "Cleaned output directory at {$outputDirectory}\n");
