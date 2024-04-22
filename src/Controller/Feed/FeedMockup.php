<?php

namespace Controller\Feed;
use Core\Utils\Mocky\Mockable;

class FeedMockup extends Mockable {
    public function mock() {
        $this->set("nameTable", [
            "Morning Musings: Embracing the Day",
            "Everyday Adventures: Finding Beauty in the Ordinary",
            "Foodie Finds: Culinary Delights Await!",
            "Wanderlust Chronicles: Exploring New Horizons",
            "Wellness Wisdom: Nourishing Mind, Body, and Soul",
            "Cozy Corner: Snuggle Up with a Good Read",
            "Pet Pals: Furry Friends and Fun Times",
            "Creative Chronicles: Unleashing Imagination",
            "Throwback Tales: Memories Worth Sharing",
            "Nature's Palette: Colors of the Earth"
        ]);

        $this->set("descTable", [
            "A cozy café nestled in a corner, adorned with mismatched chairs and vintage artwork.",
            "A sprawling forest, where sunlight dances through the leaves, creating patterns on the forest floor.",
            "A bustling marketplace filled with the aroma of spices and the sound of vendors haggling.",
            "An old bookstore with shelves reaching to the ceiling, each book whispering stories of ages past.",
            "A quiet beach at dawn, the waves gently kissing the shore as seagulls call in the distance.",
            "A majestic mountain peak piercing the clouds, inviting adventurers to conquer its heights.",
            "A quaint cottage surrounded by wildflowers, its wooden door welcoming weary travelers.",
            "A vibrant cityscape at night, illuminated by neon lights and buzzing with life.",
            "A tranquil garden filled with blooming flowers and the soothing sound of trickling water.",
            "An ancient castle perched on a hill, its stone walls holding centuries of secrets.",
            "A colorful carnival, alive with the laughter of children and the scent of cotton candy.",
            "A mysterious cave hidden deep within a dense forest, echoing with whispers of the past.",
            "A picturesque vineyard, rows of grapevines stretching as far as the eye can see.",
            "A serene lakeside retreat, where the water reflects the colors of the sunset like a mirror.",
            "A whimsical treehouse nestled among the branches, a sanctuary for imagination to flourish.",
            "A bustling train station, where travelers come and go amidst the rhythmic clatter of trains.",
            "A snowy wilderness, silent and pristine, with only the crunch of footsteps breaking the stillness.",
            "A magical garden filled with fantastical creatures and plants that seem to shimmer with enchantment.",
            "A cozy cabin in the woods, its fireplace crackling with warmth on a chilly evening.",
            "A hidden waterfall cascading down moss-covered rocks, a hidden gem waiting to be discovered."
        ]);
    }
}