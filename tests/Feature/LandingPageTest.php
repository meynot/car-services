<?php

test('landing page loads successfully', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSee('AutoCare Pro');
    $response->assertSee('Professional Car Services');
    $response->assertSee('Our Services');
    $response->assertSee('Get In Touch');
});

test('landing page contains all main sections', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    
    // Check for main sections
    $response->assertSee('hero-gradient');
    $response->assertSee('services');
    $response->assertSee('about');
    $response->assertSee('contact');
    
    // Check for service cards
    $response->assertSee('Engine Repair');
    $response->assertSee('Brake Service');
    $response->assertSee('Oil Change');
    $response->assertSee('Tire Service');
});

test('landing page has responsive design elements', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    
    // Check for responsive classes
    $response->assertSee('sm:text-5xl');
    $response->assertSee('lg:text-6xl');
    $response->assertSee('xl:text-7xl');
    $response->assertSee('grid-cols-1 sm:grid-cols-2 lg:grid-cols-3');
});

test('landing page has proper meta tags', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSee('csrf-token');
    $response->assertSee('viewport');
    $response->assertSee('Professional Car Services');
});
