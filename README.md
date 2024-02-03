# Ocena pracownikow

## Cel programu

W większości miejsc pracy regularnie przeprowadza się oceny pracowników. Każdy pracownik ma obowiązek ocenić wszystkich swoich współpracowników. W miejscach, takich jak linie produkcyjne czy magazyny, oceny są zazwyczaj przeprowadzane w formie ankiet. Natomiast w pracy biurowej, oceny odbywają się podczas wielogodzinnych spotkań, podczas których każdy pracownik omawia swoje uwagi i spostrzeżenia.

Celem tego programu jest ułatwienie procesu oceniania współpracowników w środowisku biurowym. Zakładając, że każdy pracownik wypełniłby ankietę, spotkania mogłyby zostać skrócone nawet o kilka godzin. Wypełnione formularze dotyczące jednej osoby byłyby udostępniane wszystkim uczestnikom spotkania. Każdy miałby prawo zgłosić zastrzeżenia do opinii lub oceny, co doprowadziłoby do głębszej rozmowy. Jednakże, gdy nikt nie ma żadnych zastrzeżeń do wystawionej oceny, spotkanie kontynuowałoby się zgodnie z ustaloną formułą.


## Jak Działa

Aby rozpocząć korzystanie z programu, użytkownik musi zalogować się na swoje konto za pomocą adresu e-mail oraz wcześniej ustalonego hasła lub założyć nowe konto. Podczas zakładania konta należy podać informacje takie jak imię, nazwisko, e-mail, hasło oraz numer identyfikacyjny grupy, do której będzie należał.

Po poprawnym zalogowaniu użytkownik otrzymuje listę pracowników z jego grupy, których ma obowiązek ocenić, odpowiadając na 6 pytań oraz opisując swoje przemyślenia na temat sposobu pracy danej osoby. Po przesłaniu oceny, "plakietka" osoby ocenionej zostanie przeniesiona z głównej listy do zakładki 'ocenieni pracownicy'. Użytkownik ma również dostęp do ocen, jakie wystawili mu inni, jednak nie widzi, kto wystawił daną ocenę, aby cały proces oceniania mógł odbyć się anonimowo.

## Interakcja z Użytkownikiem

1. Logowanie
Ten plik odpowiada za autentykację i rejestrację użytkownika. Kluczowe interakcje to:
- Formularz Logowania: Użytkownicy mogą wprowadzić swój adres e-mail i hasło, aby się zalogować.
- Formularz Rejestracji: Nowi użytkownicy mogą zarejestrować się, podając swoje imię, nazwisko, adres e-mail, hasło i identyfikator grupy.
- Obsługa Błędów: Skrypt obsługuje błędy związane z logowaniem i rejestracją, dostarczając informacji zwrotnej dla użytkownika.
- Przełączanie Między Formularzami Logowania a Rejestracji: Użytkownicy mogą przełączać się między formularzami logowania a rejestracji.

2. Wystawianie ocen współpracownikom
Wystawianie ocen współpracownikom obejmuje takie funkcjonalnosci jak:
- wyskakujace okno z formularzem do wypelnienia: 6 pytan i 1 opis
- decyzyjnosc uzytkownika kogo bedzie w danej chwili ocenial

4. Wyświetlanie otrzymanych ocen
W tym pliku interakcje z użytkownikami obejmują wyświetlanie listy pracowników do oceny. Plik wydaje się być częścią systemu ocen pracowników. Główne punkty interakcji to:
- Wyświetlanie Ikony Pracownika: Skrypt pobiera informacje o użytkownikach i wyświetla ikony dla każdego pracownika. Użytkownicy mogą kliknąć te ikony, aby rozpocząć proces oceny.
- Formularz Popup do Oceny: Kliknięcie na ikonę pracownika otwiera formularz popup, w którym zalogowany użytkownik może dostarczyć oceny dla wybranego pracownika. Formularz obejmuje pytania i obszar do dostarczenia opisu zwrotnego.
- Dynamiczne Generowanie Elementów HTML: Plik dynamicznie generuje elementy HTML na podstawie danych pobranych z bazy danych, takie jak ikony pracownika i formularze oceny.

## Wersje 

### ver.0.02 Beta - 23.11.2023

Zmiany w tej wersji aktualizuja kod tka aby był zgodny z zasadą KISS

Wprowadzone zminay:
 - zamiana pól do wyboru  trybu z checkbox na radio


### ver.0.03 Beta - 23.11.2023

Wprowadzone zmiany:
 - Usuniecie zbednych komentarzy
 - Wstawienie pomocnych i opisowych komentarzy do kazdej funkcji


### ver.0.04 Beta - 23.11.2023

Wprowadzone zmiany:
 - Zmiana nazw: Funkcji, zminnych w js na nazwy opisujace cel funkcji/zminnej w programe
 - Zmiana nazw: class, id w html i css na nazwy odpowiadajace danym elementom na stronie



### ver.0.05 Beta - 23.11.2023

Wprowadzone zmiany:
 - Usuniecie zakomentowanego kodu
 - Usuniecie kodu który za nic nie odpoiadał
 - Usuniecie powtarzajacego się kodu
