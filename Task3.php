<?php

class userAuthenticated // Аутентифікація користувача
{
    public function __construct(
        protected int $userId,
        protected string $username,
        protected string $password,
        protected string $role,
    ) {
    }

    public function getId(): int
    {
        return $this->userId;
    }

    public function getName(): string
    {
        return $this->username;
    }

    public function getRole(): string
    {
        return $this->role;
    }

}

class DisplayProfileUser // Відображення профілю користувача
{
    public function userProfileDisplay(userAuthenticated $userId): string
    {
        return 'Імʼя користувача: ' . $userId->getName() . PHP_EOL . 'Роль користувача: ' . $userId->getRole();
    }
}

$user1 = new userAuthenticated(1, 'Oleksiy', 'Qwerty', 'admin');

$displayUser1 = new DisplayProfileUser();

echo $displayUser1->userProfileDisplay($user1);
echo PHP_EOL;
echo PHP_EOL;

class Order // Обробка замовлення
{
    public function __construct(
        protected int $idOrder,
        protected string $nameOrder,
    ) {
    }


    public function getIdOrder(): int
    {
        return $this->idOrder;
    }


    public function getNameOrder(): string
    {
        return $this->nameOrder;
    }
}

class DisplayInfoOrder // Відображення інформації про замовлення
{
    public function orderInfoDisplay(Order $idOrder): string
    {
        return 'Назва товару: ' . $idOrder->getNameOrder();
    }
}

$order1 = new Order(1, 'Cable');
$displayOrder1 = new DisplayInfoOrder();
echo $displayOrder1->orderInfoDisplay($order1);
echo PHP_EOL;
echo PHP_EOL;

class DataManager // Збереження даних в базі даних
{
    public function __construct(
        protected int $idData,
        protected string $data,
    ) {
    }


    public function getIdData(): int
    {
        return $this->idData;
    }

    public function getData(): string
    {
        return $this->data;
    }
}

class displayDataManager // Відображення даних на веб-сторінці
{
    public function managerDataDisplay(DataManager $dataManager): string
    {
        return 'Ось усі дані: ' . $dataManager->getData();
    }
}

$dataManager1 = new DataManager(1, 'Це і є усі дані)))');
$displayDataManager1 = new displayDataManager();
echo $displayDataManager1->managerDataDisplay($dataManager1);

echo PHP_EOL;
echo PHP_EOL;


interface WriteFile
{
    public function writing(
        string $filename,
        string $ext,
    ): bool;
}

class TxtWriting implements WriteFile
{ // Запис даних в файл
    public function writing(string $filename, string $ext,): bool
    {
        if ($ext === 'txt') {
            return true; // функціонал запису файлів типу txt
        }
        return false;
    }
}

class CsvWriting implements WriteFile
{
    public function writing(string $filename, string $ext,): bool
    {
        if ($ext === 'csv') {
            return true;
        }
        return false;
    }
}

interface ReadFile
{
    public function reading(
        string $ext
    ): bool;
}

class TxtReading implements ReadFile
{

    public function reading(string $ext): bool
    {
        if ($ext === 'txt') {
            return true; // Читання запису файлів типу txt
        }
        return false; //  Читання запису файлів інших типів
    }
}

class CsvReading implements ReadFile
{
    public function reading(string $ext): bool
    {
        if ($ext === 'csv') {
            return true; // Читання запису файлів типу txt
        }
        return false; //  Читання запису файлів інших типів
    }
}

interface generateReport
{
    public function generate(
        string $data,
        string $format,
    ): bool;

}

class ReportGenPdf implements generateReport
{
    public function generate(string $data, string $format,): bool
    {
        if ($format === 'pdf') {
            return true;
        }
        return false;
    }
}

class ReportGenCsv implements generateReport
{
    public function generate(string $data, string $format,): bool
    {
        if ($format === 'csv') {
            return true;
        }
        return false;
    }
}


interface OrderProcessor
{
    public function processOrder(
        $data,

        $format,
    ): bool;
}

class Product implements OrderProcessor
{
    protected string $order;

    public function processOrder($data, $format): bool
    {
        if ($this->order == 'product') {
            $this->processOrder('order with type product', 'pdf');
        }
        return false;
    }
}

class Service implements OrderProcessor
{
    protected string $order;

    public function processOrder($data, $format): bool
    {
        if ($this->order == 'service') {
            $this->processOrder('order with type service', 'CSV');
        }
        return false;
    }
}

class Delivery implements OrderProcessor
{
    protected string $order;

    public function processOrder($data, $format): bool
    {
        if ($this->order == 'delivery') {
            $this->processOrder('order with type delivery', 'pdf');
        }
        return false;
    }
}