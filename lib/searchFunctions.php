<?php
/**
 * Funzione di ordine superiore funzione che restituisce una funzione
 * Programmazione Funzionale - dichiarativo 
 */
function searchText($searchText)
{
    return function ($taskItem) use ($searchText)
    {
        $cleanSpaces = preg_replace('/[ ]+/m', ' ', $searchText);
        $stringLower = strtolower($taskItem['taskName']);
        $searchLower = trim(strtolower($cleanSpaces));
        if ($searchLower !== '')
        {
            $result = strpos($stringLower, $searchLower) !== false;
        } else {
            $result = true;
        }
        return $result;
    };
}

function searchStatus(string $_status): callable
{
    return function ($mockTaskItem) use ($_status)
    {
        if (($_status !== 'all') || ($_status !== ''))
        {
            $result = strpos($mockTaskItem['status'], $_status) !== false;
        } else {
            $result = true;
        }
        return $result;
    };
}