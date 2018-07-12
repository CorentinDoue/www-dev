import {Component, Input, OnInit} from '@angular/core';
import {Step} from './step';

@Component({
  selector: 'spc-progress-bar',
  templateUrl: './progress-bar.component.html',
  styleUrls: ['./progress-bar.component.scss']
})
export class ProgressBarComponent implements OnInit {

  @Input() rank = 2.5;
  @Input() logo;

  steps = [
    new Step ('Beginner', 0, 1, 'bg-danger', 'beginner.svg'),
    new Step ('Elementary', 1, 2, 'elementary', 'elementary.svg'),
    new Step ('Intermediate', 2, 3, 'intermediate', 'intermediate.svg'),
    new Step ('Advanced', 3, 4, 'advanced', 'advanced.svg'),
    new Step ('Expert', 4, 5, 'bg-success', 'expert.svg')
  ];

  bgColor = '';
  barStyle;

  constructor() { }

  ngOnInit() {
    this.bgColor = this.getBgColor();
    this.barStyle = this.getWidth();
  }

  getBgColor() {
    if (this.rank === 0) {
      return this.steps[0].bgColor;
    } else if (this.rank > 0 && this.rank <= 1) {
      return this.steps[0].bgColor;
    } else if (this.rank > 1 && this.rank <= 2) {
      return this.steps[1].bgColor;
    } else if (this.rank > 2 && this.rank <= 3) {
      return this.steps[2].bgColor;
    } else if (this.rank > 3 && this.rank <= 4) {
      return this.steps[3].bgColor;
    } else if (this.rank > 4 && this.rank <= 5) {
      return this.steps[4].bgColor;
    }
  }

  getWidth() {
      return {'width' : '' + Math.floor((this.rank) * 100 / 5) + '%'};
  }

}
