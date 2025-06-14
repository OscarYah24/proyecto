<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MockupsController extends Controller
{
   public function index(Request $request)
{
    $mockups = $this->getMockupsData();
    $category = 'DESIGN'; // Categoría por defecto
    
    return view('home', compact('mockups', 'category'));
}

    public function design(Request $request)
    {
        $mockups = $this->getMockupsData();
        $category = 'DESIGN';
        
        return view('home', compact('mockups', 'category'));
    }

    public function resources(Request $request)
    {
        $mockups = $this->getMockupsData();
        $category = 'RESOURCES';
        
        return view('home', compact('mockups', 'category'));
    }

    public function prototyping(Request $request)
    {
        $mockups = $this->getMockupsData();
        $category = 'PROTOTYPING';
        
        return view('home', compact('mockups', 'category'));
    }

   
    public function code(Request $request)
    {
        $mockups = $this->getMockupsData();
        $category = 'CODE';
        
        return view('home', compact('mockups', 'category'));
    }


    public function ux(Request $request)
    {
        $mockups = $this->getMockupsData();
        $category = 'UX';
        
        return view('home', compact('mockups', 'category'));
    }

    
    public function search(Request $request)
    {
        $query = $request->get('query', '');
        $categoryFilter = $request->get('category', 'DESIGN');
        
        $mockups = $this->getMockupsData();
        
        if (!empty($query)) {
            $mockups = array_filter($mockups, function($mockup) use ($query) {
                return stripos($mockup['title'], $query) !== false || 
                       stripos($mockup['description'], $query) !== false ||
                       stripos(implode(' ', $mockup['tags']), $query) !== false;
            });
        }
        
        return view('home', [
            'mockups' => $mockups,
            'category' => strtoupper($categoryFilter),
            'searchQuery' => $query
        ]);
    }

   
    private function getMockupsData()
    {
        return [
            [
                'id' => 1,
                'title' => 'Biodegradable Food Packaging',
                'description' => 'After recognizing the need for more eco-friendly fast food practices and packaging, designer Liza Akimis created biodegradable food packaging as part of a school project.',
                'image' => 'https://picsum.photos/400/300?random=1 ',
                'tags' => ['Food', 'Packaging'],
                'created_at' => '3 days ago'
            ],
            [
                'id' => 2,
                'title' => 'Placeit: Create Mockups right in your Browser (now 15% off!)',
                'description' => 'Creating perfect mockups has never been so easy. With Placeit\'s user-friendly online editor, you can find incredible templates on matters such as apparel, digital devices, print materials and much more.',
                'image' => 'https://picsum.photos/400/300?random=2',
                'tags' => ['iPhone', 'Laptop', 'MacBook', 'Mugs'],
                'created_at' => '1 day ago'
            ],
            [
                'id' => 3,
                'title' => 'Flatscreen TV Modifies Perception, Reduces Package Damage During Delivery',
                'description' => 'For some reason, bicycles in big cardboard boxes have a tendency to get dropped, bashed or crushed by delivery companies, which has spurred Dutch manufacturer VanMoof into action to find a solution.',
                'image' => 'https://picsum.photos/400/300?random=3',
                'tags' => ['Packaging', 'Innovation'],
                'created_at' => '5 days ago'
            ],
            [
                'id' => 4,
                'title' => 'Modern Workspace Mockup Collection',
                'description' => 'A comprehensive collection of workspace mockups featuring modern office setups, perfect for showcasing your designs in professional environments.',
                'image' => 'https://picsum.photos/400/300?random=4',
                'tags' => ['Workspace', 'Office', 'Modern'],
                'created_at' => '2 days ago'
            ],
            [
                'id' => 5,
                'title' => 'Coffee Branding Mockup Set',
                'description' => 'Complete coffee shop branding mockup collection including cups, bags, and promotional materials for coffee businesses.',
                'image' => 'https://picsum.photos/400/300?random=5 ',
                'tags' => ['Coffee', 'Branding', 'Food'],
                'created_at' => '4 days ago'
            ],
            [
                'id' => 6,
                'title' => 'Mobile App Presentation Mockup',
                'description' => 'Professional mobile app mockup templates for iOS and Android applications, perfect for client presentations and app store listings.',
                'image' => 'https://picsum.photos/400/300?random=6 ',
                'tags' => ['Mobile', 'App', 'iPhone'],
                'created_at' => '6 days ago'
            ]
        ];
    }
}