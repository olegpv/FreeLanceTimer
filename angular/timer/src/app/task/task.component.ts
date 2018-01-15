import { Input, Component, OnInit, ViewEncapsulation } from '@angular/core';
import { Task } from '../model/task';
import { TaskService } from '../model/task.service';


@Component({
  selector: 'task',
  templateUrl: './task.component.html',
  styleUrls: ['./task.component.css'],
  //encapsulation: ViewEncapsulation.None
})
export class TaskComponent implements OnInit {

  constructor(private taskService: TaskService) {
  }

  @Input() task: Task;
  startTime: number;
  startTaskTime: number;

  ngOnInit() {
    if (this.task.started) {
      this.start();
    }
    setInterval(() => {
      if (this.task.started) {
        this.task.t = (Date.now() - this.startTime) / 1000 + this.startTaskTime
      }
    }, 1000)
  }

  start() {
    this.startTime = Date.now();
    this.startTaskTime = this.task.t;
    this.task.started = true;
  }

  // stop() {
  //   this.task.started = false;
  // }

  onclickStart() {
    this.taskService.startTask(this.task.id).subscribe(() => {
      this.start();
    });

  }

  onclickStop() {
    this.taskService.stopTask(this.task.id).subscribe((task: Task) => {
      this.task = task;
    });

  }

}
