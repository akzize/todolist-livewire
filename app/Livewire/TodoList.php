<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    // for validation, livewire provide the rules method
    #[Rule('required')]
    public $title;

    public $search;
    
    #[Rule('required')]
    public $editedTodoName;
    public $editedTodoId;
    
    
    public function create()
    {
        // and here we can validate and get the validated data like in controller

        // $validated = $this->validate(); // here it will validate all the public properties
        $validated = $this->validateOnly('title'); // here it will validate only the title property

        // now saving data
        Todo::create($validated);

        // and here we can reset the property
        $this->reset('title');

        // the message 
        session()->flash('success', 'Todo Created Successfully');
    }

    // handle delete
    public function deleteTodo(Todo $todo)
    {
        $todo->delete();
    }

    // handling the todo status
    public function handleCheck(Todo $todo)
    {
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    // for editing the todo
    public function edit(Todo $todo)
    {
        // $this->editedTodo = $todo;
        $this->editedTodoName = $todo->title;
        $this->editedTodoId = $todo->id;
    }

    // for updating the todo
    public function update(Todo $todo)
    {
        // dd($todo);
        dd($this->editedTodoName);
        $todo = Todo::query()->find($this->editedTodoId);
        $todo->title = $this->editedTodoName;
        $todo->save();
    }

    // for canceling the edit
    public function cancel()
    {
        $this->reset('editedTodoId', 'editedTodoName');
    }

    public function render()
    {
        // here we can get the data from database
        // $todos = Todo::query()->latest()->get();
        // we can paginate the data too, but we should use withPagination trait

        // also we can search the data
        $todos = Todo::query()->latest()->where('title', 'like', "%{$this->search}%")->paginate(3);

        // dd($todos);
        return view('livewire.todo-list', [
            'todos' => $todos
        ]);
    }
}
