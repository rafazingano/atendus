<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum Status: string implements HasLabel, HasDescription, HasColor, HasIcon
{
    case Draft = 'Rascunho';
    case Reviewing = 'Em Revisão';
    case Published = 'Publicado';
    case Rejected = 'Rejeitado';

    /**
     * Retorna o rótulo do status.
     */
    public function getLabel(): ?string
    {
        return match ($this) {
            self::Draft => 'Rascunho',
            self::Reviewing => 'Em Revisão',
            self::Published => 'Publicado',
            self::Rejected => 'Rejeitado',
        };
    }

    /**
     * Retorna a descrição do status.
     */
    public function getDescription(): ?string
    {
        return match ($this) {
            self::Draft => 'Este conteúdo ainda não foi finalizado.',
            self::Reviewing => 'Este conteúdo está pronto para revisão.',
            self::Published => 'Este conteúdo foi aprovado e está público no site.',
            self::Rejected => 'Um membro da equipe decidiu que este conteúdo não é apropriado para o site.',
        };
    }

    /**
     * Retorna a cor associada ao status.
     */
    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Draft => 'gray',
            self::Reviewing => 'warning',
            self::Published => 'success',
            self::Rejected => 'danger',
        };
    }

    /**
     * Retorna o ícone associado ao status.
     */
    public function getIcon(): ?string
    {
        return match ($this) {
            self::Draft => 'heroicon-m-pencil',
            self::Reviewing => 'heroicon-m-eye',
            self::Published => 'heroicon-m-check',
            self::Rejected => 'heroicon-m-x-mark',
        };
    }
}
