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
        if ($_SERVER['REQUEST_METHOD'] === "GET"){
            $repo = new EmployeeRepository();

            $loader = new \Twig\Loader\FilesystemLoader('../templates/Employee');
            $twig = new \Twig\Environment($loader, []);
            echo $twig->render('employee.form.html.twig');



        }else{
            $employee = new Employee();
            $repo = new EmployeeRepository();
            $employee->setFname($_POST['fname']);
            $employee->setLname($_POST['lname']);
            $repo->create($employee);
            echo 'into the db';

        }
    }

    public function update(int $id): void
    {

        if ($_SERVER['REQUEST_METHOD'] === "GET"){
            $repo = new EmployeeRepository();
            $data = $repo->findById($id);

            $loader = new \Twig\Loader\FilesystemLoader('../templates/Employee');
            $twig = new \Twig\Environment($loader, []);
            echo $twig->render('employee.form.html.twig',['employee'=> $data]);

        }else{
            $repo = new EmployeeRepository();
            $employee = $repo->findById($id);
            $employee->setFname($_POST['fname']);
            $employee->setLname($_POST['lname']);
            $repo->update($employee);
            echo 'change the db';
        }
    }
    public function delete(int $id): void
    {
        $repo = new EmployeeRepository();
        $repo->delete($id);
        echo 'bye';
    }
}