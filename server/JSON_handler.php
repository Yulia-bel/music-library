<?php 

function getObj( string $url) : arrayObject
{
  // get the content json
  $jsonfile = file_get_contents($url);
  // parse to string
  $stringJson = json_decode($jsonfile);

  return $stringJson;
}


function searchByUserName(ArrayObject $obj ,string $user) : Object
{
  //iterate arrayobjects
  for ($i =0; $i < count($obj); $i++)
  {
    //search user of all object arrays
    if($obj[$i]->userName == $user)
    {
      return $obj[$i];
    };
  };
  echo "user not found";
}

function addNewObj(arrayObject $mainObj, object $newObj ) : arrayObject
{
  // push the new obj, new obj is too new user
  array_push($mainObj,$newObj);
  // return the new obj with the new data 
  return $mainObj;
}

function saveJson(ArrayObject $mainObj, string $url) : void
{
  // convert to json 
  $json = json_encode($mainObj);
  // overwrite file.json
  file_put_contents($url,$json);
}