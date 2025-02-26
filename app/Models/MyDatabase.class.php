<?php

namespace web\Models;
//require_once("../DB/about.json");

class MyDatabase
{
    private $paragraphsFile = "app/DB/about.json";
    private $eventsFile = "app/DB/events.json";
    private $photosFile = "app/DB/photos.json";

    // Save paragraphs
    public function saveParagraphs($paragraph1, $paragraph2)
    {
        $data = [
            "paragraph1" => $paragraph1,
            "paragraph2" => $paragraph2
        ];
        file_put_contents($this->paragraphsFile, json_encode($data, JSON_PRETTY_PRINT));
        return true;
    }

    // Save an event
    public function saveEvent($name, $day, $month, $year, $description, $photoPath)
    {
        $events = $this->getEvents();
        $events[] = [
            "name" => $name,
            "day" => $day,
            "month" => $month,
            "year" => $year,
            "description" => $description,
            "photo" => $photoPath
        ];
        file_put_contents($this->eventsFile, json_encode($events, JSON_PRETTY_PRINT));
        return true;
    }

    // Save a photo
    public function savePhoto($photoPath)
    {
        $photos = $this->getPhotos();
        $photos[] = ["path" => $photoPath];
        file_put_contents($this->photosFile, json_encode($photos, JSON_PRETTY_PRINT));
        return true;
    }

    // Retrieve paragraphs
    public function getParagraphs()
    {
        if (!file_exists($this->paragraphsFile)) return null;
        return json_decode(file_get_contents($this->paragraphsFile), true);
    }

    // Retrieve all events
    public function getEvents()
    {
        if (!file_exists($this->eventsFile)) return [];
        return json_decode(file_get_contents($this->eventsFile), true);
    }

    // Retrieve all photos
    public function getPhotos()
    {
        if (!file_exists($this->photosFile)) return [];
        return json_decode(file_get_contents($this->photosFile), true);
    }
}

?>


