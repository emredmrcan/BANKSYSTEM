<?php

/**
 * Created by PhpStorm.
 * User: Emre
 * Date: 9.5.2017
 * Time: 23:27
 */
class Ticket
{
    private $ticket_id;
    private $ticket_customer;
    private $ticket_category;
    private $ticket_location;
    private $ticket_date;
    private $ticket_price;
    private $ticket_count;

    public function __construct($ticket_id = NULL, $ticket_customer = NULL, $ticket_category = NULL,$ticket_location = NULL,$ticket_date = NULL, $ticket_price = NULL, $ticket_count = NULL)
    {
        $this->ticket_id = $ticket_id;
        $this->ticket_customer = $ticket_customer;
        $this->ticket_category = $ticket_category;
        $this->ticket_location = $ticket_location;
        $this->ticket_date = $ticket_date;
        $this->ticket_price = $ticket_price;
        $this->ticket_count = $ticket_count;
    }

    /**
     * @return mixed
     */
    public function getTicketİd()
    {
        return $this->ticket_id;
    }

    /**
     * @return mixed
     */
    public function getTicketCustomer()
    {
        return $this->ticket_customer;
    }

    /**
     * @return mixed
     */
    public function getTicketCategory()
    {
        return $this->ticket_category;
    }

    /**
     * @return mixed
     */
    public function getTicketPrice()
    {
        return $this->ticket_price;
    }

    /**
     * @return mixed
     */
    public function getTicketCount()
    {
        return $this->ticket_count;
    }
    public function getTicketDate()
    {
        return $this->ticket_date;
    }


    public function getTicketLocation()
    {
        return $this->ticket_location;
    }
}