<?php

namespace App\Actions\System;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Lorisleiva\Actions\Concerns\AsAction;
use function Pest\Laravel\artisan;

class MakeTranslations
{
    use AsAction;

    public string $commandSignature = 'trans:system';


    public function handle()
    {
        $this->trans();
    }
    public function trans()
    {

        Artisan::call("translatable:export", ["lang"=>"en,lt"]);
        $raw = File::get(base_path("lang/en.json"));
        $systemTranslations = $this->getSystemTranslations('en');
        $systemMessages = Arr::dot($systemTranslations);
        $json = json_encode($systemMessages);
        File::put("lang/system-en.json", $json);

    }


    private function getSystemTranslations($locale = 'en')
    {
        $vendorLangPath = base_path("vendor/laravel/framework/src/Illuminate/Translation/lang/{$locale}");
        $translations = [];

        if (File::exists($vendorLangPath)) {
            $files = File::allFiles($vendorLangPath);

            foreach ($files as $file) {
                $filename = $file->getFilenameWithoutExtension();
                $translations[$filename] = include $file->getPathname();
            }
        }

        return $translations;
    }


}
