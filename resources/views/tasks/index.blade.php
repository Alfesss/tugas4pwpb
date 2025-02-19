@extends('layouts.master')

@section('pageTitle', $pageTitle)

@section('main')
<div class="task-list-container">
    <h1 class="task-list-heading">Task List</h1>

    <div class="task-list-task-buttons">
        <a href="{{ route('tasks.create') }}">
            <button class="task-list-button">
                <span class="material-icons">add</span>Add task
            </button>
        </a>
    </div>
    
    <div class="task-cards" style="display: grid; grid-template-columns: 1fr; gap: 20px;">
        @foreach ($tasks as $index => $task)
            <div class="task-card" style="width: 100%;">
                <div class="task-card-header">
                    <div class="task-card-header-content">
                        <span class="material-icons {{ $task->status == 'completed' ? 'check-icon-completed' : 'check-icon' }}">
                            check_circle
                        </span>
                        <h2 class="task-card-title">{{ $task->name }}</h2>
                    </div>
                </div>
                <div class="task-card-body">
                    <div class="task-info">
                        <div class="task-info-item">
                            <span class="task-info-label">Detail:</span>
                            <span class="task-info-value">{{ $task->detail }}</span>
                        </div>
                        <div class="task-info-item">
                            <span class="task-info-label">Due Date:</span>
                            <span class="task-info-value">{{ $task->due_date }}</span>
                        </div>
                        <div class="task-info-item">
                            <span class="task-info-label">Progress:</span>
                            <span class="task-info-value">
                                @switch($task->status)
                                    @case('in_progress')
                                        In Progress
                                        @break
                                    @case('in_review')
                                        Waiting/In Review
                                        @break
                                    @case('completed')
                                        Completed
                                        @break
                                    @default
                                        Not Started
                                @endswitch
                            </span>
                        </div>
                    </div>
                </div>
                <div class="task-card-footer">
                    <a href="{{ route('tasks.edit', ['id' => $task->id]) }}" class="task-card-edit">
                        <span class="material-icons">edit</span>
                        Edit
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
