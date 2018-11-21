<?php
/* responsibility: holds zero, one or many pokemon objects;
* is able to add pokemon object
 * is able to delete pokemon objects
 * is able to return one specific pokemon based on id
 * is able to return an random pokemon
 * is able to return a formatted list of all pokemons in the bag
 */


class PokeBag 
{
    // array of all pokemons
    private $pokemons = [];

    public function add(Pokemon $pokemon) 
    {
        // return the complete array $this->_pokemons
        array_push($this->pokemons, $pokemon);
    }

    public function delete($id) 
    {
        // use array_key_exists to check if array has a certain id,
        // use array_splice to remove an item and reindex the array
    }

    public function all() 
    {
        // return the complete array $this->_pokemons
        return $this->pokemons;
    }

    public function getAllNames() 
    {
        $pokemon_names = [];

        foreach ($this->pokemons as $pokemon) {
            array_push($pokemon_names, $pokemon->name);       
        }

        return $pokemon_names;
    }

    public function get($id)
    {
        // get a single item from the array $this->_pokemons
        return $this->pokemons[$id];
    }

    public function random() 
    {
        // use array_rand
        return array_rand($this->pokemons);
    }
}