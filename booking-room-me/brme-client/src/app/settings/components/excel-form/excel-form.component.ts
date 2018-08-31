import {ChangeDetectorRef, Component, EventEmitter, Input, OnInit, Output} from '@angular/core';
import {AbstractControl, FormBuilder, FormControl, FormGroup, ValidatorFn, Validators} from '@angular/forms';
import * as fromRoomForm from '../../reducers/room-form.reducer';
import { Store} from '@ngrx/store';
import {Room} from '../../../bookings/models/room.model';
import {UrlSafeStringService} from '../../../core/services/url-safe-string.service';



@Component({
  selector: 'brme-excel-form',
  templateUrl: './excel-form.component.html',
  styleUrls: ['./excel-form.component.scss']
})
export class ExcelFormComponent implements OnInit {

  @Input() errorMessage: string | null;

  @Output() submitted = new EventEmitter<Room>();
  filetouched = false;

  form: FormGroup = this.fb.group({
    file: [null, [this.fileValidator(), Validators.required]],
    filename: ['']
  });


  get file() { return this.form.get('file'); }
  get filename() { return this.form.get('filename'); }


  constructor(private fb: FormBuilder,
              private store: Store<fromRoomForm.State>,
              private cd: ChangeDetectorRef, private urlSafeString: UrlSafeStringService) {}

  ngOnInit() {
  }

  submit() {
    if (this.form.valid) {
      this.submitted.emit(this.form.value);
    }
  }

  getErrorMessage(formControl: FormControl) {
    if ( this.filetouched ) {
      return formControl.hasError('required') ? 'Veuillez charger un fichier' :
        formControl.hasError('fileNotValid') ? 'Le fichier n\'est pas un Excel valide' : '';
    } else {
      return '';
    }
  }

  onFileChange(event) {
    if (event.target.files && event.target.files.length) {
      const file = event.target.files.item(0);
      this.file.setValue(file);
      this.filename.setValue(this.urlSafeString.generate(file.name) + file.name.split('.').pop().toLowerCase());
      this.filetouched = true;
      this.cd.markForCheck();
    }
  }

  fileValidator(): ValidatorFn {
    return (control: AbstractControl): {[key: string]: any} | null => {
      const fileTypes = ['xls', 'xlsx'];
      let forbidden;
      if ( control.value !== null ) {
        const extension = control.value.name.split('.').pop().toLowerCase();
        forbidden = fileTypes.indexOf(extension) === -1;
      } else {
        forbidden = true;
      }
      return forbidden ? {'fileNotValid': {value: control.value}} : null;
    };
  }
}
