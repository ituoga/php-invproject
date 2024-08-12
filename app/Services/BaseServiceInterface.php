<?php

namespace App\Services;

use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

interface BaseServiceInterface
{

    public function setModule(string $module);

    public function all(): Factory|View;

    public function create(null|array $data): Factory|View;
    public function store($data): RedirectResponse;

    public function read($id): Factory|View;

    public function edit($id): Factory|View;

    public function update($id, $data): RedirectResponse;

    public function delete($id): RedirectResponse;
}
