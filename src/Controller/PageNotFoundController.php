<?php

class PageNotFoundController implements \ControllerInterface
{

    public function show(int $id): void
    {

    }

    public function showall(): void
    {
        http_response_code(404);
        echo 'Pagenotfound';
    }

    public function create(): void
    {
        // TODO: Implement create() method.
    }

    public function update(int $id): void
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}