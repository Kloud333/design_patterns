<?php


class UIImage{
    public $some_image;

}

class Filter
{
    public $filterStrategy;

    public function applayFilter(UIImage $image)
    {
        $this->filterStrategy->process($image);
    }

}

interface FilterStrategy
{
    public function process(UIImage $image): UIImage;
}


class SepiaFilter implements FilterStrategy
{
    public function process(UIImage $image): UIImage
    {
        echo 'Застосовуємо фільтр сепія до зображення';
        echo '<br>';
        return $image;
    }
}


class BlackAndWhiteFilter implements FilterStrategy
{

    public function process(UIImage $image): UIImage
    {
        echo 'Застосовуємо фільтр Чорне-Біле до зображення';
        echo '<br>';
        return $image;
    }
}

class DistortionFilter implements FilterStrategy
{

    public function process(UIImage $image): UIImage
    {
        echo 'Застосовуємо фільтр Дісторшин до зображення';
        echo '<br>';
        return $image;
    }
}

$filter = new Filter();

$image = new UIImage();

$filter->filterStrategy = new SepiaFilter();
$filter->applayFilter($image);

$filter->filterStrategy = new BlackAndWhiteFilter();
$filter->applayFilter($image);

$filter->filterStrategy = new DistortionFilter();
$filter->applayFilter($image);



