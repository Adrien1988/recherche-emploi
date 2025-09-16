<?php

declare(strict_types=1);

use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ECSConfig $ecsConfig): void {
    // Dossiers analysés – adapte si besoin
    $ecsConfig->paths([
        __DIR__ . '/app/src',
        __DIR__ . '/app/tests',
        __DIR__ . '/app/bin',
        __DIR__ . '/app/config',
        __DIR__ . '/app/public',
    ]);

    // Exclusions utiles
    $ecsConfig->skip([
        __DIR__ . '/var/*',
        __DIR__ . '/vendor/*',
    ]);

    // Jeux de règles recommandés
    $ecsConfig->sets([
        SetList::PSR_12,
        SetList::CLEAN_CODE,
        SetList::COMMON,
    ]);

    // Tes règles F-003 / custom peuvent être ajoutées ici
    // ex: $ecsConfig->rule(\PhpCsFixer\Fixer\Import\NoUnusedImportsFixer::class);
};
