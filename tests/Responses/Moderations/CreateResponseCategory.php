<?php

use Webfox\AzureOpenAI\Enums\Moderations\Category;
use Webfox\AzureOpenAI\Responses\Moderations\CreateResponseCategory;

test('from', function () {
    $category = CreateResponseCategory::from([
        'category' => Category::Hate->value,
        'violated' => true,
        'score' => 0.1234,
    ]);

    expect($category)
        ->category->toBe(Category::Hate)
        ->violated->toBe(true)
        ->score->toBe(0.1234);
});
