<?php

class EmployeeRepository extends AbstractRepository
{

    /**
     * @return Employee[]
     */
    public function findAll():array
    {
        $con = $this->dbcon();
        $sql = 'SELECT * FROM employee';
        $stmt = $con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS,'Employee');
    }

    public function findById(int $id):Employee
    {
        $con = $this->dbcon();
        $sql = 'SELECT * FROM employee where id = :id';
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id',$id );
        $stmt->execute();
        return $stmt->fetchObject('Employee');
    }

    public function create(EntityInterface $employee):Employee
    {
        $con = $this->dbcon();
        $sql = 'INSERT INTO employee (fname, lname) VALUES (:fname, :lname)';
        $stmt = $con->prepare($sql);
        $fname = $employee->getFname();
        $lname = $employee->getLname();
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname',$lname );
        $stmt->execute();
        $newEmployee = $this->findById($con->lastInsertId());
        return $newEmployee;

    }

    public function update(EntityInterface $employee):Employee
    {
        $con = $this->dbcon();
        $sql = 'UPDATE employee set fname=:fname, lname=:lname where id=:id';
        $stmt = $con->prepare($sql);
        $fname = $employee->getFname();
        $lname = $employee->getLname();
        $id = $employee->getId();
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname',$lname );
        $stmt->bindParam(':id',$id );
        $stmt->execute();

        return $this->findById($id);
    }

    public function delete(int $id)
    {
        $con = $this->dbcon();
        $sql = 'DELETE FROM employee where id = :id';
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id',$id );

        return $stmt->execute();

    }
}