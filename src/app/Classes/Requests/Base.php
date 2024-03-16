<?php

namespace app\Classes\Requests;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\LazyCollection;
use JsonMachine\Items;

class Base
{
    public function __construct(
        public string $path,
        public string $url,
        public ?int $page = 1,
        public ?int $perPage = 1000,
    )
    {
        Http::fake([
            $this->url => Http::response($this->lazyCollection()),
        ]);
    }

    protected function lazyCollection(): Collection
    {
        return LazyCollection::make(function () {
            $items = Items::fromFile(Storage::disk('local')->path($this->path));
            foreach ($items as $item) {
                yield $item;
            }
        })->collect()->forPage($this->page, $this->perPage);
    }
}
