package com.mock.bodyguards.mapper;

import com.mock.bodyguards.config.MapperConfig;
import com.mock.bodyguards.dto.example.ExampleRequest;
import com.mock.bodyguards.dto.example.ExampleResponse;
import com.mock.bodyguards.entity.Example;
import org.mapstruct.*;

import java.util.List;

@Mapper( config = MapperConfig.class)
public interface ExampleMapper{
    ExampleResponse toDto(Example e);

    @Mapping(target = "id", ignore = true)
    @Mapping(target = "createdAt", ignore = true)
    @Mapping(target = "updatedAt", ignore = true)
    Example toEntity(ExampleRequest d);

    List<ExampleResponse> toDto(List<Example> e);

    List<Example> toEntity(List<ExampleResponse> d);

//    @Named("partialUpdate")
//    @BeanMapping(nullValuePropertyMappingStrategy = NullValuePropertyMappingStrategy.IGNORE)
//    @Mapping(target = "id", ignore = true)
//    @Mapping(target = "createdAt", ignore = true)
//    @Mapping(target = "updatedAt", ignore = true)
//    void partialUpdate(ExampleResponse d, Example e);
}
