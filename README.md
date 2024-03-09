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
 - Formularz Rejestracji: Nowi użytkownicy mogą zarejestrować się, podając swoje imię, nazwisko, adres e-mail, hasło i  identyfikator grupy.
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


### ver.0.02 Beta - 01.11.2024

Wprowadzone zminay:
 - wprowadzenie zsady KISS
 - zamiana pól do wyboru  trybu z checkbox na radio


### ver.0.03 Beta - 01.11.2024

Wprowadzone zmiany:
 - Usuniecie zbednych komentarzy
 - Wstawienie pomocnych i opisowych komentarzy do kazdej funkcji


### ver.0.04 Beta - 01.12.2024

Wprowadzone zmiany:
 - Zmiana nazw: Funkcji, zminnych w js na nazwy opisujace cel funkcji/zminnej w programe
 - Zmiana nazw: class, id w html i css na nazwy odpowiadajace danym elementom na stronie



### ver.0.05 Beta - 01.12.2024

Wprowadzone zmiany:
 - Usuniecie zakomentowanego kodu
 - Usuniecie kodu który za nic nie odpoiadał
 - Usuniecie powtarzajacego się kodu

### ver.0.7 Beta - 01.29.2024

Wprowadzone zmiany:
 - naprawa błędu: ikony ocenionych pracowników nie przenoszą się do sekcji 'ocenieni pracownicy'
 - naprawa błędu: dołączanie osób do zespołu czasami nie działa

### ver.0.7 Beta - 01.02.2024

Wprowadzone zmiany:
 - Dodanie opcji sprawdzania ocen jakie inni wystawili na temat użytkownika zalogowanego
 - Dodanie opcji usuniecia konta

### ver.0.7 Beta - 06.02.2024

Wprowadzone zmiany:
 - Zarpojektowanie i wykonanie testu programu za pomocą "Selenium IDE"

   Oczekiwany przebieg testu:
   1. Utworzenie konta za pomoca danych: test1, test1, test1, test@test1, 123, 123, 123
   2. Wylogowanie z konta 'test1'
   3. Utworzenie konta za pomoca danych: test2, test2, test2, test@test2, 123, 123, 123
   4. Sprawdzenie czy 'test2' i 'test1' zostal poprawnie przypisany do grupy poprzez nacisniecie ikony podpisanej 'test1'
   5. Wypelnienie formularza ocenowego
   6. Przeslanie oceny
   7. Sprawdzenie czy ikona podpisana 'test1' zostala przeniesiona do zakladki "Ocenieni pracownicy"
   8. Wylogowanie z konta 'test2'
   9. Zalogowanie na konto 'test1'
   10. Przejście na stronę "MojeOceny"
   11. Sprawdzenie czy istnieje ocena wystawiona przez 'test2'
   12. Usuniecie konta 'test1'
   13. Zalogowanie na konto 'test2'
   14. Usuniecie konta 'test2'

Test wykonuje sie poprawnie na aktualnej wersji


### ver.0.7.5 - 06.03.2024

Dodanie rangi uzytkownika "Lider zespolu"
Aby uzytkownik uzyskał rangę lidera podczas zakładania konta musi wpisac na w polu imie: swojeimie oraz "=XXX"
Głownym założeniem rangi "Lider zespołu" jest to aby uzytkownik z takimi uprawniniami miał wgląd do wszystkich ocen wystawionych przez wspópracowników

Test wykonuje sie poprawnie na aktualnej wersji


### ver.0.7.6 - 08.03.2024

Naprawa łędu powstałego w wesji 0.7.5. Błąd polegał na tym że na stronie MojeOceny nieważne jaką ocenę wybrał użytkownik wyświetlała sie ta sama ocena.

Test wykonuje sie poprawnie na aktualnej wersji


### ver.0.8 - 09.03.2024

Ukończnie rangi "TeamLeader" - lide ma wgląd do wszystkich ocen oraz ma możliwość zobaczyć zawartosc ocen

Test wykonuje sie poprawnie na aktualnej wersji

