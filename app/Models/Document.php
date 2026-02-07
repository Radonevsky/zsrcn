<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property string $uuid
 * @property int $article_id
 * @property string $path
 * @property string $url
 * @property string $name
 * @property string $type
 * @property string $created_at
 * @property string $updated_at
 *
 * @mixin Builder
 */

class Document extends Authenticatable
{
    const DOCUMENT_TYPES_PLURAL = [
        'reports',
        'statements2026',
        'statements2025',
        'statements2024',
        'statements2023',
        'statements2022',
        'statements2021',
        'statements2020',
        'statements2019',
        'plannings2026',
        'plannings2025',
        'plannings2024',
        'plannings2023',
        'plannings2022',
        'plannings2021',
        'plannings2020',
        'plannings2019',
        'charter-changes-docs',
        'foster-common-docs',
        'foster-school-docs',
        'foster-club-docs',
        'foster-service-docs',
        'citizen-appeals-docs',
        'citizen-appeals-analysis-docs',
        'methodical-programm-summer-docs',
        'methodical-social-technologies-docs',
        'methodical-work-docs',
        'anti-corruption-booklets-docs',
        'anti-corruption-memo-docs',
        'nok-report-docs',
        'memos-docs',
        'workplace-improvements-docs',
        'workplace-quality-docs',
        'results-2021-docs',
        'plan-2021-docs',
        'quality-assessment',
        'social-assessment-docs',
    ];

    protected $fillable = [
        'path',
        'url',
        'type',
        'name,'
    ];
}
