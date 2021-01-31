<?php

return [
    'order' => [
        // class of your domain object
        'class' => App\Models\Order::class,

        // property of your object holding the actual state (default is "state")
        'property_path' => 'state',
        // list of all possible states
        'states' => [
            'new',
            'pending',
            'preparing',
            'delivering',
            'done'
        ],

        // list of all possible transitions
        'transitions' => [
            'pending' => [
                'from' => ['pending'],
                'to' => 'preparing'
            ],
            'preparing' => [
                'from' => ['pending'],
                'to' => 'preparing'
            ],
            'delivering' => [
                'from' => ['preparing'],
                'to' => 'delivering'
            ],
            'done' => [
                'from' => ['delivering'],
                'to' => 'done'
            ],
        ],

        // list of all callbacks
        'callbacks' => [
            // will be called when testing a transition
            'guard' => [
                'guard_on_submitting' => [
                    // call the callback on a specific transition
                    'on' => 'submit_changes',
                    // will call the method of this class
                    'do' => ['MyClass', 'handle'],
                    // arguments for the callback
                    'args' => ['object'],
                ],
                'guard_on_approving' => [
                    // call the callback on a specific transition
                    'on' => 'approve',
                    // will check the ability on the gate or the class policy
                    'can' => 'approve',
                ],
            ],

            // will be called before applying a transition
            'before' => [],

            // will be called after applying a transition
            'after' => [
                // should fire event to notify user
            ],
        ],
    ],
];
