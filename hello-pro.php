<?php
/*
Plugin Name: Hello Dolly Pro
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong or Barbra Streisand: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Toni Viemerö
Version: 1.0
Author URI: https://selfdestruct.net/

Original author: Matt Mullenweg
*/

function hello_dolly_pro_get_lyric() {
	$lyrics = array();

	/** These are the lyrics to Hello Dolly by Louis Armstrong */
	$lyrics[] = "Hello, Dolly
Well, hello, Dolly
It's so nice to have you back where you belong
You're lookin' swell, Dolly
I can tell, Dolly
You're still glowin', you're still crowin'
You're still goin' strong
We feel the room swayin'
While the band's playin'
One of your old favourite songs from way back when
So, take her wrap, fellas
Find her an empty lap, fellas
Dolly'll never go away again
Hello, Dolly
Well, hello, Dolly
It's so nice to have you back where you belong
You're lookin' swell, Dolly
I can tell, Dolly
You're still glowin', you're still crowin'
You're still goin' strong
We feel the room swayin'
While the band's playin'
One of your old favourite songs from way back when
Golly, gee, fellas
Find her a vacant knee, fellas
Dolly'll never go away
Dolly'll never go away
Dolly'll never go away again";

	/** These are the lyrics to Hello Dolly by Barbra Streisand */
	$lyrics[] = "Hello, Rudy
Well, Hello Harry
It's so nice to be back home where I belong
You are looking swell, Manny
I can tell, Danny
You're still glowin', you're still crowin'
You're still goin' strong
I feel the room swayin'
For the band's playin'
One of my old fav'rite songs from 'way back when
So, bridge that gap, fellas
Find me an empty lap, fellas
Dolly'll never go away again
Hello, Dolly,
Well Hello, Dolly,
It's so nice to have you back where you belong
You're looking swell, Dolly,
We can tell, Dolly,
You're still glowin', you're still crowin'
You're still goin' strong.
We feel the room swayin'
For the band's playin'
One of your old fav'rite songs from 'way back when, so...
Here's my hat fellas
I'm stayin' where I'm at, fellas
Promise you'll never go away again
I went away from the lights of fourteenth street
And into my personal haze
But now that I'm back in the lights of 14th Street
Tomorrow will be brighter than the good old days
Those good old days
Tell 'em to be sweet!
Hello, Well Hello Dolly!
Well hello, hey look there's Dolly!
Glad to see you Hank, let's thank my lucky star
Your lucky star
You're lookin' great, Stanley
Lose some weight, I think, I think you did, Stanley?
Dolly's overjoyed and overwhelmed and over par
I hear the ice tinkle
Do you hear the ice tinkle
See the lights twinkle
Can you see the lights twinkle
And you still get glances from us handsome men
So...
Look at you all, you're all so handsome
Golly gee, fellas
Find me a vacant knee, fellas
Dolly'll never go away again
Well, hello
Look who's here!
Dolly, this is Louis
Hello, Louis!
Dolly,
It's so nice to have you back where you belong
I am so glad to be back!
Are you lookin' swell,
Thank you, Louis!
Dolly!
I can tell,
Does it show?
Dolly!
You're still glowin', you're still crowin'
You're still
Uhm...goin' strong
I feel the room swayin'
Pee pee pah dah pee pah
And the band's playin'
pah pah pah dee pah dee pah pah
One of our old favorite songs from way back when, so!
pah pah pah pah pah pah pah
I remember it so, you're my favorite!
Show some snap, find her an empty lap, yeah!
Yeahuuhm!
Dolly'll never go away again...
Well, well Hello, Dolly,
Well, Hello, Dolly,
It's so nice to have you back where you belong
You're looking swell, Dolly, (wow)
We can tell, Dolly, (wow)
You're still glowin', you're still crowin'
You're still goin' strong.
I hear the ice tinkle
I hear it tinkle
See the lights twinkle
I see them twinkle
And you still get glances from us handsome men
So...
Mmmm, Wow wow wow, fellas
Hey, Yeah!
Look at the old girl now, fellas
Wow!
Dolly'll never go away again.
Dolly'll never go away again.
Dolly'll never go away again.";

	// Here we split it into lines
	$lyrics = explode( "\n", implode( "\n", $lyrics ) );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_dolly_pro() {
	$chosen = hello_dolly_pro_get_lyric();
	echo "<p id='dolly-pro'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_dolly_pro' );

// We need some CSS to position the paragraph
function dolly_pro_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dolly-pro {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'dolly_pro_css' );
