<?php

namespace Database\Seeders;

use App\Models\Reward;
use Illuminate\Database\Seeder;

class RewardSeeder extends Seeder
{
    public function run(): void
    {
        Reward::truncate();

        $rewards = [
            // Featured
            ['name' => 'Virtue Shield', 'category' => 'featured', 'cost' => 1000, 'item_id' => '0x7818', 'description' => 'A legendary shield bearing the virtues of Britannia.'],
            ['name' => 'Violet Soulstone Token', 'category' => 'featured', 'cost' => 1000, 'item_id' => '0x2A93', 'description' => 'Transfer skill points between your characters.'],
            ['name' => 'Bank Stone', 'category' => 'featured', 'cost' => 1000, 'item_id' => '0x485', 'description' => 'Place in your home for instant access to your bank.'],
            ['name' => 'Public Soulstone', 'category' => 'featured', 'cost' => 1500, 'item_id' => '0x2A93', 'description' => 'A soulstone that any character on your account can use.'],
            ['name' => 'Mythic Character Token', 'category' => 'featured', 'cost' => 1500, 'item_id' => '0x2AAA', 'description' => 'Create a fully trained character with advanced skills.'],
            ['name' => 'Cursed Removal Deed', 'category' => 'featured', 'cost' => 500, 'item_id' => '0x14F0', 'description' => 'Remove the cursed property from any item.'],
            ['name' => 'Attribute Removal Deed', 'category' => 'featured', 'cost' => 500, 'item_id' => '0x14F0', 'description' => 'Remove negative attributes from equipment.'],
            ['name' => 'Transmogrification Potion', 'category' => 'featured', 'cost' => 500, 'item_id' => '0xF0E', 'description' => 'Reshape your character\'s appearance.'],

            // Mounts
            ['name' => 'Ethereal Dragon (Hildebrandt)', 'category' => 'mounts', 'cost' => 1500, 'item_id' => '0xB162', 'description' => 'A majestic ethereal dragon mount.'],
            ['name' => 'Ethereal Hellfire Steed', 'category' => 'mounts', 'cost' => 1500, 'item_id' => '0xB165', 'description' => 'An ethereal mount wreathed in flame.'],
            ['name' => 'Charger of the Fallen', 'category' => 'mounts', 'cost' => 1000, 'item_id' => '0x2D9C', 'description' => 'A shadowy mount for the dark-hearted.'],
            ['name' => 'Windrunner Statue', 'category' => 'mounts', 'cost' => 1000, 'item_id' => '0x9ED5', 'description' => 'A swift and graceful ethereal mount.'],
            ['name' => 'Lasher Statue', 'category' => 'mounts', 'cost' => 1000, 'item_id' => '0x9E35', 'description' => 'An ethereal mount with a whipping tail.'],
            ['name' => 'Skeletal Cat Statue', 'category' => 'mounts', 'cost' => 1000, 'item_id' => '0xA138', 'description' => 'A macabre skeletal feline mount.'],
            ['name' => 'Coconut Crab Statue', 'category' => 'mounts', 'cost' => 1000, 'item_id' => '0xA335', 'description' => 'A unique tropical crab mount.'],
            ['name' => 'Eowmu Statue', 'category' => 'mounts', 'cost' => 1000, 'item_id' => '0xA0C0', 'description' => 'A majestic bird-like mount.'],

            // Character
            ['name' => 'Character Reincarnation Token', 'category' => 'character', 'cost' => 2000, 'item_id' => '0x2AAA', 'description' => 'Rebuild your character from scratch with a fresh start.'],
            ['name' => 'Gender Change Token', 'category' => 'character', 'cost' => 1000, 'item_id' => '0x2AAA', 'description' => 'Change your character\'s gender.'],
            ['name' => 'Name Change Token', 'category' => 'character', 'cost' => 1000, 'item_id' => '0x2AAA', 'description' => 'Rename your character.'],
            ['name' => 'Stable Slot Increase Token', 'category' => 'character', 'cost' => 500, 'item_id' => '0x2AAA', 'description' => 'Add an additional stable slot for your pets.'],
            ['name' => 'Mystical Polymorph Totem', 'category' => 'character', 'cost' => 600, 'item_id' => '0xA276', 'description' => 'Transform into various creatures.'],
            ['name' => 'Abyssal Hair Dye', 'category' => 'character', 'cost' => 400, 'item_id' => '0x9C7A', 'description' => 'Dye your hair with rare abyssal colors.'],
            ['name' => 'Special Hair Dye (Various Colors)', 'category' => 'character', 'cost' => 400, 'item_id' => '0x9C78', 'description' => 'Available in Lemon Lime, Bloodwood Red, Vivid Blue, Ash Blonde, Dusk Black, and more.'],

            // Equipment
            ['name' => 'Hooded Britannia Robe', 'category' => 'equipment', 'cost' => 1500, 'item_id' => '0xA0AB', 'description' => 'Iconic hooded robe in White, Red, Blue, Green, or Purple.'],
            ['name' => 'Hooded Shroud of Shadows', 'category' => 'equipment', 'cost' => 1000, 'item_id' => '0x2684', 'description' => 'A mysterious shroud worn by assassins and shadowmancers.'],
            ['name' => 'Smuggler\'s Edge', 'category' => 'equipment', 'cost' => 400, 'item_id' => '0x9C63', 'description' => 'A sharp blade favored by rogues and thieves.'],
            ['name' => 'Undertaker\'s Staff', 'category' => 'equipment', 'cost' => 500, 'item_id' => '0x13F8', 'description' => 'A grim staff wielded by those who walk between worlds.'],
            ['name' => 'Quiver of Infinity', 'category' => 'equipment', 'cost' => 100, 'item_id' => '0x2B02', 'description' => 'A quiver that never runs out of arrows.'],
            ['name' => 'Holy Sword', 'category' => 'equipment', 'cost' => 100, 'item_id' => '0xF61', 'description' => 'A righteous blade blessed by the virtues.'],
            ['name' => 'Leggings of Embers', 'category' => 'equipment', 'cost' => 100, 'item_id' => '0x1411', 'description' => 'Leggings forged in dragon fire.'],
            ['name' => 'Earrings of Protection', 'category' => 'equipment', 'cost' => 200, 'item_id' => '0x9C66', 'description' => 'Available in Physical, Fire, Cold, Poison, or Energy variants.'],
            ['name' => 'Pigments of Tokuno', 'category' => 'equipment', 'cost' => 400, 'item_id' => '0x9CA8', 'description' => 'Rare pigments for dyeing armor. 20+ colors available.'],

            // Decorations
            ['name' => 'Castle Mini House Deed', 'category' => 'decorations', 'cost' => 200, 'item_id' => '0x9CB0', 'description' => 'A miniature castle for your home.'],
            ['name' => 'Tower Mini House Deed', 'category' => 'decorations', 'cost' => 200, 'item_id' => '0x9CB2', 'description' => 'A miniature tower decoration.'],
            ['name' => 'Decorative Kitchen Set', 'category' => 'decorations', 'cost' => 1200, 'item_id' => '0x9CE8', 'description' => 'A complete kitchen set for your home.'],
            ['name' => 'Raised Garden Deed (3 Pack)', 'category' => 'decorations', 'cost' => 2000, 'item_id' => '0x9C8B', 'description' => 'Grow your own herbs and reagents at home.'],
            ['name' => 'House Teleporter Tile Bag', 'category' => 'decorations', 'cost' => 1000, 'item_id' => '0x40B9', 'description' => 'Set up teleport points within your home.'],
            ['name' => 'Secret Chest', 'category' => 'decorations', 'cost' => 500, 'item_id' => '0x9706', 'description' => 'A hidden chest only visible to you.'],
            ['name' => 'Britannian Ship Deed', 'category' => 'decorations', 'cost' => 1200, 'item_id' => '0x9C6A', 'description' => 'Claim your own Britannian sailing vessel.'],
            ['name' => 'Squirrel Mailbox', 'category' => 'decorations', 'cost' => 400, 'item_id' => '0xA207', 'description' => 'A charming squirrel-shaped mailbox.'],
            ['name' => 'Fountain of Life Deed', 'category' => 'decorations', 'cost' => 100, 'item_id' => '0x2AC0', 'description' => 'A magical fountain that restores health to those near it.'],
            ['name' => 'Hitching Post', 'category' => 'decorations', 'cost' => 200, 'item_id' => '0x14E7', 'description' => 'Tether your mount outside your home.'],
            ['name' => 'Woodworker\'s Bench Deed', 'category' => 'decorations', 'cost' => 600, 'item_id' => '0x14F0', 'description' => 'A crafting station for carpenters.'],

            // Miscellaneous
            ['name' => 'Pet Bonding Potion', 'category' => 'misc', 'cost' => 500, 'item_id' => '0x9CBC', 'description' => 'Instantly bond with your pet.'],
            ['name' => 'Pet Branding Iron', 'category' => 'misc', 'cost' => 600, 'item_id' => '0x9CC3', 'description' => 'Rename and customize your pet.'],
            ['name' => 'Forged Metal of Artifacts (10 Uses)', 'category' => 'misc', 'cost' => 1000, 'item_id' => '0x9C65', 'description' => 'Re-imbue artifacts with powerful properties.'],
            ['name' => 'Forged Metal of Artifacts (5 Uses)', 'category' => 'misc', 'cost' => 600, 'item_id' => '0x9C65', 'description' => 'Re-imbue artifacts with powerful properties.'],
            ['name' => 'Improved Rock Hammer', 'category' => 'misc', 'cost' => 1000, 'item_id' => '0x9CBB', 'description' => 'A miner\'s tool that never breaks.'],
            ['name' => 'Merchant\'s Trinket (Teleporting)', 'category' => 'misc', 'cost' => 500, 'item_id' => '0x9C67', 'description' => 'Teleport to your home from anywhere.'],
            ['name' => 'Pen of Wisdom', 'category' => 'misc', 'cost' => 600, 'item_id' => '0x9C62', 'description' => 'Rewrite spellbooks and inscriptions.'],
            ['name' => 'Bag of Bulk Order Covers', 'category' => 'misc', 'cost' => 200, 'item_id' => '0x9CC6', 'description' => 'A bag containing various BOD covers.'],
            ['name' => 'Armor Engraving Tool Token', 'category' => 'misc', 'cost' => 200, 'item_id' => '0x9C65', 'description' => 'Engrave your name on armor.'],
        ];

        $order = 0;
        foreach ($rewards as $reward) {
            Reward::create(array_merge($reward, ['display_order' => $order++]));
        }
    }
}
