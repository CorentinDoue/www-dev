import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';
import {Project} from '../../../data/project';
import {animate, style, transition, trigger} from '@angular/animations';

@Component({
  selector: 'spc-project',
  templateUrl: './project.component.html',
  styleUrls: ['./project.component.scss'],
  animations: [
    trigger('bodyState', [
      transition(':enter', [
        style({ opacity: 0, height: 0 }),
        animate('200ms 100ms')
      ]),
      transition(':leave', [
        animate(200, style({ opacity: 0, height: 0 }))
      ]),
    ]),
    trigger('headState', [
      transition(':enter', [
        style({ opacity: 0, width: 0, whiteSpace: 'nowrap'}),
        animate(100)
      ]),
      transition(':leave', [
        animate(200, style({ opacity: 0, width: 0, whiteSpace: 'nowrap'}))
      ]),
    ]),
    trigger('markerState', [
      transition(':enter', [
        style({ opacity: 0, width: 0, whiteSpace: 'nowrap'}),
        animate(100)
      ]),
      transition(':leave', [
        animate(50, style({ opacity: 0, width: 0, whiteSpace: 'nowrap'}))
      ]),
    ])
  ]
})
export class ProjectComponent implements OnInit {
  @Input() project: Project;
  @Input() index: number;
  @Input() open: boolean;

  @Output() opened = new EventEmitter<boolean>();

  constructor() { }

  ngOnInit() {
  }

  switch() {
    if (this.open) {
      this.open = false;
    } else {
      this.opened.emit(true);
      this.open = true;
    }
  }
}
