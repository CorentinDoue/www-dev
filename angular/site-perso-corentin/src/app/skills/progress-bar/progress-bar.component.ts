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

  constructor() { }

  ngOnInit() {
    this.bgColor = this.getBgColor();
  }

  getBgColor() {
    let bgColor = '';
    const minValue = this.getInterval()[1];
    this.steps.forEach(function(step) {
      if ((this.rank > step.minValue && this.rank <= step.maxValue) || (this.rank === minValue && this.rank === step.minValue)){
        bgColor = step.bgColor;
      }
    }, this);
    return bgColor;
  }

  getInterval() {
    let minValue = Infinity, maxValue = -Infinity;
    this.steps.forEach(function(step) {
      if (minValue > step.minValue){
        minValue = step.minValue;
      }
      if (maxValue < step.maxValue){
        maxValue = step.maxValue;
      }
    });
    return [minValue, maxValue];
  }

}
