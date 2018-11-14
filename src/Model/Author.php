<?php

namespace App\Model;

class Author
{
    /** @var string $name */
    private $name;

    /** @var \App\Model\Book[] $books */
    private $books;

    /** @var \App\Model\Country $birthCountry */
    private $birthCountry;

    /** @var \DateTime $birthDate */
    private $birthDate;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return \App\Model\Book[]
     */
    public function getBooks(): array
    {
        return $this->books;
    }

    /**
     * @param \App\Model\Book[] $books
     */
    public function setBooks(array $books): void
    {
        $this->books = $books;
    }

    /**
     * @return \App\Model\Country
     */
    public function getBirthCountry(): \App\Model\Country
    {
        return $this->birthCountry;
    }

    /**
     * @param \App\Model\Country $birthCountry
     */
    public function setBirthCountry(\App\Model\Country $birthCountry): void
    {
        $this->birthCountry = $birthCountry;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate(): \DateTime
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     */
    public function setBirthDate(\DateTime $birthDate): void
    {
        $this->birthDate = $birthDate;
    }
}
