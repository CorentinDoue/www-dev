import {Component, Input} from '@angular/core';

@Component({
  selector: 'brme-excel-pending',
  template: `
    <mat-card>
      <mat-card-title>Mettre à jour la liste des résidents</mat-card-title>
      <div class="alert alert-danger" *ngIf="error">{{error}}</div>
      <div class="alert alert-info">{{message}}</div>
      <div class="pending">
        <mat-spinner [diameter]="150" *ngIf="pending"></mat-spinner>
      </div>
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
  `]
})
export class ExcelPendingComponent {

  @Input() error;
  @Input() message;
  @Input() pending;
}
