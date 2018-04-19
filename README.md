# Wedding Website

Website for announcing wedding event and communicating with guests.

## Description

Used for communicating information to guests about the event, venue and accommodation options. Record of guests attending are saved in a database. Ability to switch between two languages (e.g. English and German).

Written in PHP / HTML5 / CSS3 / JavaScript (jQuery), using a MySQL database.

## Setup
#### login.php
Used for storing database login credentials. Example file:
```
<?php // login.php
    $db_hostname = 'localhost';
    $db_database = 'wedding';
    $db_username = 'user123';
    $db_password = 'pass123';
?>
```

#### strings.json
Used for storing text strings from two different languages. Example file snippet:
```
{
  "common": [
      {"id": "buttonLanguage", "type": "src", "EN": "images/DE.png", "DE": "images/EN.png"},
      {"id": "link1", "type": "innerHTML", "EN": "Home", "DE": "Startseite"},
      ...
  ],
  "index": [
      {"id": "formLanguage", "type": "action", "EN": "index.php?lang=DE", "DE": "index.php?lang=EN"},
      {"id": "text1", "type": "innerHTML", "EN": "Find info about our wedding...", "DE": "Wir heiraten..."}
      ...
  ],
  "timetable": [
      {"id": "formLanguage", "type": "action", "EN": "timetable.php?lang=DE", "DE": "timetable.php?lang=EN"},
      {"id": "text1", "type": "innerHTML", "EN": "The Plan", "DE": "Feier"},
      ...
```

## Contributing

All contributions are welcome, particularly feedback on code quality, bug reports, tips and ideas for improvement.

## License

All code dedicated to the world-wide public domain under a [Creative Commons Zero v1.0 Universal License](https://creativecommons.org/publicdomain/zero/1.0/)
