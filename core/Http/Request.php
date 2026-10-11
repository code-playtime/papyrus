<?php

namespace Papyrus\Http;

class Request
{
    protected $inputData = [];
    protected $jsonData = [];
    protected $queryParams = [];
    protected $headers;
    protected $files;
    protected $customData = [];
    protected $isValidated = false;

    public function __construct()
    {
        $this->inputData = $_POST;
        $this->queryParams = $this->sanitize($_GET);
        $this->jsonData = json_decode(file_get_contents('php://input'), true) ?? [];

        $this->headers = getallheaders();
        $this->files = $_FILES;

        if (method_exists($this, 'handle')) {
            $this->handle();
        }
    }

    public function all()
    {
        return array_merge(
            $this->queryParams,
            $this->inputData,
            $this->customData,
            $this->jsonData
        );
    }

    public function input(string $key, $default = null)
    {
        return $this->inputData[$key] ?? $default;
    }

    public function setInput(string $key, $value)
    {
        $this->inputData[$key] = $value;
    }

    public function deleteInput(string $key)
    {
        /* $this->inputData[$key] = null; */
    }

    /* Input from REST API */
    public function restInput(string $key, $default = null)
    {
        return $this->jsonData[$key] ?? $default;
    }

    public function param(string $key, $default = null)
    {
        return $this->queryParams[$key] ?? $default;
    }

    public function add(string $key, $value)
    {
        $this->customData[$key] = $value;
    }

    public function data(string $key, $default = null)
    {
        return $this->customData[$key] ?? $default;
    }

    public function header(string $key, $default = null)
    {
        return $this->headers[$key] ?? $default;
    }

    public function file(string $key)
    {
        return $this->files[$key] ?? null;
    }

    public function hasInput(string $key)
    {
        return (isset($this->inputData[$key]) && !empty($this->inputData[$key]));
    }

    public function hasParam(string $key)
    {
        return (isset($this->queryParams[$key]) && !empty($this->queryParams[$key]));
    }

    public function hasRestInput(string $key)
    {
        return (isset($this->jsonData[$key]) && !empty($this->jsonData[$key]));
    }

    public function hasFile(string $key)
    {
        return (isset($_FILES[$key]) && $_FILES[$key]['error'] === UPLOAD_ERR_OK);
    }

    public function sanitize($data)
    {
        if (is_array($data)) {
            return array_map([$this, 'sanitize'], $data);
        }

        return htmlspecialchars(strip_tags($data), ENT_QUOTES, 'UTF-8');
    }

    public function sanitizeInput(string $key, $default = null)
    {
        return $this->sanitize($this->inputData[$key]) ?? $default;
    }

    public function remember()
    {
        $allPostData = $this->inputData;
        $secureInputs = $this->secure();
        $_SESSION["inputs"] = array_diff_key($allPostData, array_flip($secureInputs));
    }

    protected function secure()
    {
        return [];
    }

    protected function validate()
    {
        //
    }

    protected function handle()
    {
        //
    }
}
