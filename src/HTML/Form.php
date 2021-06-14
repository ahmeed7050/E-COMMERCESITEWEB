<?php

namespace App\HTML;

class Form
{
    private $data;
    private $errors;
    public function __construct($data, array $errors)
    {
        $this->data = $data;
        $this->errors = $errors;
    }

    public function input(string $key, string $label): string
    {
        $value = $this->getValue($key);
        $type = $key === "password" ? "password" : "text";
        $inputClass = 'form-control';
        $invalidFeedback = '';
        if (isset($this->errors[$key])) {
            $inputClass .= ' is-invalid';
            $invalidFeedback = '<div class="invalid-feedback">' . implode('<br>', $this->errors[$key]) . '</div>';
        }
        return <<<HTML
        <div class="form-group">
            <label for="field{$key}">{$label}</label>
            <input type="{$type}" id="field{$key}" class="{$inputClass}" name="{$key}" value="{$value}" required>
            {$invalidFeedback}
    </div>
HTML;
    }
    public function textarea(string $key, string $label): string
    {
        $value = $this->getValue($key);
        $inputClass = 'form-control';
        $invalidFeedback = '';
        if (isset($this->errors[$key])) {
            $inputClass .= ' is-invalid';
            $invalidFeedback = '<div class="invalid-feedback">' . implode('<br>', $this->errors[$key]) . '</div>';
        }
        return <<<HTML
        <div class="form-group">
            <label for="field{$key}">{$label}</label>
            <textarea type="text" id="field{$key}" class="{$inputClass}" name="{$key}" required>{$value}</textarea>
            {$invalidFeedback}
    </div>
HTML;
    }
    public function select(string $key, string $label, array $options = []): string
    {

        $optionsHTML = [];
        $value = $this->getValue($key);

        foreach ($options as $k => $v) {
            $selected = in_array($k, $value) ? " selected" : "";
            $optionsHTML[] = "<option value=\"$k\"$selected>$v</option>";
        }
        $optionHTML = implode('', $optionsHTML);
        $inputClass = 'form-control';
        $invalidFeedback = '';
        if (isset($this->errors[$key])) {
            $inputClass .= ' is-invalid';
            $invalidFeedback = '<div class="invalid-feedback">' . implode('<br>', $this->errors[$key]) . '</div>';
        }
        return <<<HTML
        <div class="form-group">
            <label for="field{$key}">{$label}</label>
            <select id="field{$key}" class="{$inputClass}" name="{$key}[]" required multiple> {$optionHTML}</select>
            {$invalidFeedback}
        </div>
HTML;
    }

    private function getValue(string $key)
    {
        if (is_array($this->data)) {
            return $this->data[$key] ?? null;
        }

        $method = 'get' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
        $value = $this->data->$method();
        if ($value instanceof \DateTimeInterface) {
            return $value->format('Y-m-d H:i:s');
        }
        return $value;
    }
}
