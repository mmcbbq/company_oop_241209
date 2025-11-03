<?php
class EmployeeController implements ControllerInterface
{

    public function show(int $id): void
    {
        $repo = new EmployeeRepository();
        $entity = $repo->findById($id);


        $loader = new \Twig\Loader\FilesystemLoader('../templates/Employee');
        $twig = new \Twig\Environment($loader, []);

        echo $twig->render('employee.show.html.twig', ['employee' => $entity,'peter'=> 123]);

    }

    public function showall(): void
    {
        $repo = new EmployeeRepository();
        $data = $repo->findAll();



        $loader = new \Twig\Loader\FilesystemLoader('../templates/Employee');
        $twig = new \Twig\Environment($loader, []);


        echo $twig->render('employee.showall.html.twig',['employees'=>$data]);

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