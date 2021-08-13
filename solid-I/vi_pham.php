<?php

interface Workable
{
    public function canCode();
    public function code();
    public function test();
}

// Implement interface
class Developer implements Workable
{
    public function canCode()
    {
        return true;
    }
    public function code()
    {
        return 'coding';
    }
    public function test()
    {
        return 'testing in localhost';
    }
}

class Tester implements Workable
{
    public function canCode()
    {
        return false;
    }
    public function code()
    {
        // El QA no puede programar
        throw new Exception('Opps! I can not code');
    }
    public function test()
    {
        return 'testing in test server';
    }
}

// Thực hiện
/*
 * Nếu chúng ta chú ý, chúng ta sẽ thấy rằng Tester class có một phương thức không tương ứng với nó vì nó
 * không được gọi và nếu nó được gọi thì nó sẽ cho chúng ta một phương thức Exception.
 *
 */
class ProjectManagement
{
    public function processCode(Workable $member)
    {
        if ($member->canCode()) {
            $member->code();
        }
    }
}