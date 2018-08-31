import {Component, Input} from '@angular/core';
import {Router} from '@angular/router';

@Component({
  selector: 'brme-excel-success',
  template: `
    <mat-card>
      <mat-card-title>Mettre à jour la liste des résidents</mat-card-title>
      <div class="alert alert-success" *ngIf="success">{{success}}</div>
      <div class="pending">
        <svg-icon src="assets/check.svg" [svgStyle]="{ 'width.%': '100', 'height.%': '100' }" (click)="done()"></svg-icon>
      </div>
      <div class="alert">{{message}}</div>
    </mat-card>
  `,
  styles: [`
    :host {
      display: flex;
      justify-content: center;
      margin: 20px 0;
    }
    mat-card-title,
    mat-card-content {
      display: flex;
      justify-content: center;
      margin-bottom: 40px;
    }
    .pending {
      width: 100%;
      height: 250px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    svg-icon {
      width: 120px;
      height: 120px;
      cursor: pointer;
    }
  `]
})
export class ExcelSuccessComponent {

  @Input() success;
  @Input() message;

  constructor(private routeur: Router) {}

  done() {
    this.routeur.navigate([]);
  }
}
