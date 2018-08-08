import {Component, ElementRef, EventEmitter, Input, OnInit, Output, ViewChild} from '@angular/core';
import {Project} from '../../../data/project';
import {animate, style, transition, trigger} from '@angular/animations';
import {Router} from '@angular/router';

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
  @ViewChild('topp') top: ElementRef;

  constructor(private router: Router) { }

  ngOnInit() {
  }

  switch() {
    if (this.open) {
      this.open = false;
      this.router.navigate(['/projects']);
    } else {
      // this.router.navigate(['/projects'], {fragment: this.project.id});
      this.open = true;
    }
  }

  onNavigate(link: string) {
    window.open(link, '_blank');
  }
}
