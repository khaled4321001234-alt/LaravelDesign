<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Collection;

class NewsRepository
{
    public function all(): Collection
    {
        return collect(config('news.items'));
    }

    public function featured(int $limit = 4): Collection
    {
        return $this->all()
            ->filter(fn (array $item): bool => $item['featured'] ?? false)
            ->take($limit)
            ->values();
    }

    public function paginate(?int $perPage = null): LengthAwarePaginator
    {
        $perPage = $perPage ?? config('news.per_page', 6);
        $items = $this->all();
        $page = Paginator::resolveCurrentPage();

        return new Paginator(
            $items->forPage($page, $perPage)->values(),
            $items->count(),
            $perPage,
            $page,
            ['path' => Paginator::resolveCurrentPath()],
        );
    }

    public function findBySlug(string $slug): ?array
    {
        $item = $this->all()->firstWhere('slug', $slug);

        return $item ? (array) $item : null;
    }

    public function related(array $current, int $limit = 3): Collection
    {
        return $this->all()
            ->where('slug', '!=', $current['slug'])
            ->take($limit)
            ->values();
    }
}
