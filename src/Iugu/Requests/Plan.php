<?php

namespace Iugu\Requests;

class Plan extends AbstractRequest
{
    /**
     * All plans
     * @return object
     */
    public function plans()
    {
        $response = $this->request('plans');

        return $this->parseResponse($response);
    }
    
    /**
     * Find plan
     * @param string $id
     * @return object
     */
    public function find(string $id)
    {
        $response = $this->request('plans/' . $id);

        return $this->parseResponse($response);
    }
    
    /**
     * Find plan by identifier
     * @param string $identifier
     * @return object
     */
    public function findByIdentifier(string $identifier)
    {
        $response = $this->request('plans/identifier/' . $identifier);

        return $this->parseResponse($response);
    }
    
    /**
     * Delete a plan
     * @param string $id
     * @return object
     */
    public function delete(string $id)
    {
        $response = $this->request('plans/' . $id, 'DELETE');

        return $this->parseResponse($response);
    }
    
    /**
     * Edit a plan
     * @param string $id
     * @param array $data
     * @return object
     */
    public function edit(string $id, array $data)
    {
        $response = $this->request('plans/' . $id, 'PUT', $data);

        return $this->parseResponse($response);
    }
    
    /**
     * Create new plan
     * @param array $data
     * @return object
     */
    public function create(array $data)
    {
        $response = $this->request('plans', 'POST', $data);

        return $this->parseResponse($response);
    }
}