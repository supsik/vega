<?php

namespace App\MoonShine\InputExtensions;

use MoonShine\InputExtensions\InputExtension;

class InputCharCount extends InputExtension
{
    protected static string $view = 'input-extensions.char-count';

    protected array $xData = [
        'charCount: $refs.extensionInput.value.length',
        'init() {
            const input = this.$refs.extensionInput;
            input.addEventListener(`input`, () => {

                if (input.value.length > maxCount){
                    input.value = input.value.slice(0, maxCount);
                    return;
                }

                this.charCount = input.value.length;
            })
        }',
    ];

    public function __construct(public int $maxChar, mixed $value = null)
    {
        parent::__construct($value);

        $this->xInit = [
            "maxCount = {$this->maxChar}"
        ];
    }
}
