# php-markdown-blog-system

Der Benutzer kann nur die Setup-Seite aufrufen, wenn die Datei **/app/core/first.txt** existiert. In dem Setup kann der Benutzer dann seinen Zugang einrichten, die zuvor genannte Textdatei wird darauf automatisch gelöscht. 

Über das PMBS *localhost/pmbs* (php-markdown-blog-system) kann der Benutzer neue Blogposts erstellen, alte verwalten und deren Statistiken einsehen.   

Das Password mit der Standard PHP funktion *password_hash* verschlüsselt. Die Authentifizierung eines Nutzers läuft über die Klasse User in */core/user.inc.php*.

Ein weiteres Feauture ist, dass Aufrufe auf Blogseiten geloggt werden. Um keine doppelten Aufrufe von Benutzern zu zählen, verwende ich als Primär-Schlüssel des *views* den sha256 hash aus IP Adresse + Blog ID. (*Z.B. $IP (1.1.1.1) . $ID (90) = 1.1.1.190 = a0618f1d5758eb2eec5d8ae6cd939795bfdb6de141987bb06d43f70e3ab23588*)  

Das konvertieren von Markdown zu HTML läuft über die PHPMarkdown Klasse in */app/core/phpmarkdown.php/*. 

Falls Sie das ganze bei sich lokal hosten möchten, befindet sich ein export der SQL Datenbank unter */app/concept/database/pmbs.sql*.

