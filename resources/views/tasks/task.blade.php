<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Task List</title>
  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 20px;
    }
    
    .task-list-container {
      max-width: 1200px;
      margin: 40px auto;
      background: white;
      border: 3px solid #000;
      border-radius: 12px;
      box-shadow: 8px 8px 0 #000;
      padding: 30px;
    }

    .task-list-heading {
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 30px;
      color: #1a1a1a;
      text-align: center;
    }

    .task-list-table-head {
      display: grid;
      grid-template-columns: 2fr 3fr 1fr 1.5fr;
      gap: 20px;
      padding: 15px 20px;
      background-color: #ffcc00;
      border: 2px solid #000;
      border-radius: 8px;
      margin-bottom: 15px;
      font-weight: 600;
    }

    .table-body {
      display: grid;
      grid-template-columns: 2fr 3fr 1fr 1.5fr;
      gap: 20px;
      padding: 15px 20px;
      border: 2px solid #000;
      border-radius: 8px;
      margin-bottom: 10px;
      background-color: white;
      transition: transform 0.2s, box-shadow 0.2s;
    }

    .table-body:hover {
      transform: translateY(-2px);
      box-shadow: 4px 4px 0 #000;
    }

    .table-body-task-name {
      display: flex;
      align-items: center;
      gap: 10px;
      font-weight: 500;
    }

    .check-icon {
      color: #666;
      transition: color 0.3s;
    }

    .check-icon-completed {
      color: #22c55e;
    }

    .table-body-progress {
      font-weight: 500;
    }

    .table-body-progress:contains("Completed") {
      color: #22c55e;
    }

    .table-body-progress:contains("In Progress") {
      color: #f59e0b;
    }

    .table-body-progress:contains("Waiting/In Review") {
      color: #3b82f6;
    }

    .table-body-progress:contains("Not Started") {
      color: #ef4444;
    }

    .table-body-due-date {
      font-weight: 500;
      color: #666;
    }

    .table-body-detail {
      color: #4b5563;
    }

    @media (max-width: 768px) {
      .task-list-table-head,
      .table-body {
        grid-template-columns: 1fr;
        gap: 10px;
      }
      
      .task-list-header-task-name,
      .task-list-header-detail,
      .task-list-header-due-date,
      .task-list-header-progress {
        display: none;
      }
      
      .table-body {
        padding: 15px;
      }
    }
  </style>
</head>
<body>
  <div class="task-list-container">
    <h1 class="task-list-heading">Task List</h1>
    <div class="task-list-table-head">
      <div class="task-list-header-task-name">Task Name</div>
      <div class="task-list-header-detail">Detail</div>
      <div class="task-list-header-due-date">Due Date</div>
      <div class="task-list-header-progress">Progress</div>
    </div>
    @foreach ($tasks as $index => $task)
      <div class="table-body">
        <div class="table-body-task-name">
          <span class="material-icons @if ($task->status == 'completed') check-icon-completed @else check-icon @endif">
            check_circle
          </span>
          {{ $task->name }}
        </div>
        <div class="table-body-detail"> {{ $task->detail }} </div>
        <div class="table-body-due-date"> {{ $task->due_date }} </div>
        <div class="table-body-progress">
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
        </div>
      </div>
    @endforeach
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function showAlert(message) {
      Swal.fire({
        title: 'Alert',
        text: message,
        icon: 'info',
        confirmButtonText: 'OK'
      });
    }
  </script>
</body>
</html>