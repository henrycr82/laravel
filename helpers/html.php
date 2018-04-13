<?php

	function oldCheckbox($checkName, $model = null)
	{
		if (!is_null(old('important'))){
			return old('important') == 1 ? 'checked' : '';
		}else{
			if(isset($model)){
				return $model->isImportant() ? 'checked' : '';
			}
		}
	}


