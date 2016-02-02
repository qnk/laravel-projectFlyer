<?php

function flash($message = '')
{
	$flash = app('App\Http\Flash');

	return $flash->message($message);
}

// link_to('Delete', $post, 'DELETE')
// link_to('Delete', 'photos/1/delete', 'DELETE')

/*
function link_to($button, $path, $type)
{
	$csrf = csrf_field();

	if (is_object($path))
	{
		$action = $path->getTable(); //photos

		if (in_array($type, ['PUT', 'PATCH', 'DELETE'])) {
			$action .= '/' . $path->id; 
		} 
	} else {
		$action = $path;
	}

	return <<<EOT
		<form method="POST" action="{$action}">
			<input type="hidden" name="_method" value="{$type}">
			$csrf
			<button type="submit">{$button}</button>
		</form>
	EOT;
}
*/
