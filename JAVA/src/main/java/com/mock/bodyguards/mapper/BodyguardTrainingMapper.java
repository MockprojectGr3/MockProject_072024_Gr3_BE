package com.mock.bodyguards.mapper;

import com.mock.bodyguards.config.MapperConfig;
import com.mock.bodyguards.dto.training.BodyguardTrainingResponse;
import com.mock.bodyguards.entity.BodyguardTraining;
import org.mapstruct.Mapper;
import org.mapstruct.Mapping;

import java.util.List;

//@Mapper(config = MapperConfig.class)
public interface BodyguardTrainingMapper extends EntityMapper<BodyguardTrainingResponse, BodyguardTraining> {
    @Override
    @Mapping(source = "bodyguard.id", target = "bodyguardId")
    @Mapping(source = "trainingCatalog.id", target = "trainingCatalogId")
    BodyguardTrainingResponse toDto(BodyguardTraining entity);

}
