<?php

namespace Iugu\Requests;

class Invoice extends AbstractRequest
{
    /**
     * All invoices
     * @return object
     */
    public function invoices()
    {
        $response = $this->request('invoices');

        return $this->parseResponse($response);
    }

    /**
     * Find invoice
     * @param string $id
     * @return object
     */
    public function find(string $id)
    {
        $response = $this->request('invoices');

        return $this->parseResponse($response);
    }

    /**
     * Create new invoice
     * @param array $data
     * @return object
     */
    public function create(array $data)
    {
        $response = $this->request('invoices', 'POST', $data);

        return $this->parseResponse($response);
    }

    /**
     * Capture invoice
     * @param string $id
     * @return object
     */
    public function capture(string $id)
    {
        $response = $this->request('invoices/' . $id . '/capture', 'POST');

        return $this->parseResponse($response);
    }
    
    /**
     * Refund invoice
     * @param string $id
     * @return object
     */
    public function refund(string $id)
    {
        $response = $this->request('invoices/' . $id . '/refund', 'POST');

        return $this->parseResponse($response);
    }
    
    /**
     * Cancel invoice
     * @param string $id
     * @return object
     */
    public function cancel(string $id)
    {
        $response = $this->request('invoices/' . $id . '/cancel', 'PUT');

        return $this->parseResponse($response);
    }
   
    /**
     * Duplicate invoice
     * @param string $id
     * @param array $data
     * @return object
     */
    public function duplicate(string $id, array $data)
    {
        $response = $this->request('invoices/' . $id . '/duplicate', 'POST');

        return $this->parseResponse($response);
    }
    
    /**
     * Email invoice
     * @param string $id
     * @param array $data
     * @return object
     */
    public function sendEmail(string $id, array $data)
    {
        $response = $this->request('invoices/' . $id . '/send_email', 'POST');

        return $this->parseResponse($response);
    }
}