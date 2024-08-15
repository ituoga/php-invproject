<?php

namespace App\Services;

use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

interface BaseServiceInterface
{

    public function setModule(string $module);

    public function all(): Factory|View;

    public function create(array $data): mixed;
    public function store($data): RedirectResponse;

    public function read($id): mixed;

    public function edit($id): Factory|View;

    public function update($id, $data): RedirectResponse;

    public function delete($id): RedirectResponse;
}
